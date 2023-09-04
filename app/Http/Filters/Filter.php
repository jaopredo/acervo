<?php

namespace App\Filters;

use Illuminate\Http\Request;

class Filter {
    protected $builder;
    protected $model;
    protected $request;

    public function __construct(Request $request, $model)
    {
        $this->builder = $model::query();
        $this->model = $model;
        $this->request = $request;
    }

    public function filter() {

        defined('FILTER_OPERATOR_LIKE')                  || define('FILTER_OPERATOR_LIKE',                'like');
        defined('FILTER_OPERATOR_EQUALS')                || define('FILTER_OPERATOR_EQUALS',              'eq');
        defined('FILTER_OPERATOR_GREATER_THAN')          || define('FILTER_OPERATOR_GREATER_THAN',        'gt');
        defined('FILTER_OPERATOR_GREATER_THAN_EQUALS')   || define('FILTER_OPERATOR_GREATER_THAN_EQUALS', 'gte');
        defined('FILTER_OPERATOR_LOWER_THAN')            || define('FILTER_OPERATOR_LOWER_THAN',          'lt');
        defined('FILTER_OPERATOR_LOWER_THAN_EQUALS')     || define('FILTER_OPERATOR_LOWER_THAN_EQUALS',   'lte');

        defined('FILTER_OPERATOR_NOT_LIKE')                  || define('FILTER_OPERATOR_NOT_LIKE',                'nlike');
        defined('FILTER_OPERATOR_NOT_EQUALS')                || define('FILTER_OPERATOR_NOT_EQUALS',              'neq');
        defined('FILTER_OPERATOR_NOT_GREATER_THAN')          || define('FILTER_OPERATOR_NOT_GREATER_THAN',        'ngt');
        defined('FILTER_OPERATOR_NOT_GREATER_THAN_EQUALS')   || define('FILTER_OPERATOR_NOT_GREATER_THAN_EQUALS', 'ngte');
        defined('FILTER_OPERATOR_NOT_LOWER_THAN')            || define('FILTER_OPERATOR_NOT_LOWER_THAN',          'nlt');
        defined('FILTER_OPERATOR_NOT_LOWER_THAN_EQUALS')     || define('FILTER_OPERATOR_NOT_LOWER_THAN_EQUALS',   'nlte');

        defined('FILTER_OPERATOR_OR') || define('FILTER_OPERATOR_OR', '<or>');
        defined('FILTER_VALUE_EMPTY') || define('FILTER_VALUE_EMPTY', '<empty>');
        defined('FILTER_VALUE_NULL') || define('FILTER_VALUE_NULL',  '<null>');


        $filter_by = $this->request->input('filters', []);

        $mainTable = $this->builder->getModel()->getTable();


        foreach ($filter_by as $fields => $operators) {

            $operators = (!is_array($operators) ? [FILTER_OPERATOR_EQUALS => $operators] : $operators);

            $fields = preg_replace('/[^A-Za-z0-9_\.\,]/', '', $fields);

            $fields = explode(',', $fields);

            $field = [];

            foreach ($fields as $key => $actualField) {

                if (substr_count($actualField, '.')) {

                    $parts = explode('.', $actualField);


                    $actualFieldName = array_pop($parts);


                    $lastJoinedTable = $mainTable;

                    foreach ($parts as $table) {

                        $aliasId = uniqid();

                        $alias = "{$table}_{$aliasId}";

                        $this->builder->join("$table as {$alias}", "{$alias}.id", "{$lastJoinedTable}.{$table}_id");

                        $lastJoinedTable = $alias;

                        $field[] = "{$alias}.{$actualFieldName}";
                    }
                }
                else {

                    $field[] = "{$mainTable}.{$actualField}";
                }

            }


            foreach ($operators as $operator => $term) {

                $actualOperator = null;

                switch ($operator) {

                    case FILTER_OPERATOR_LIKE                : $actualOperator = 'like'; break;
                    case FILTER_OPERATOR_EQUALS              : $actualOperator = '='; break;
                    case FILTER_OPERATOR_GREATER_THAN        : $actualOperator = '>'; break;
                    case FILTER_OPERATOR_GREATER_THAN_EQUALS : $actualOperator = '>='; break;
                    case FILTER_OPERATOR_LOWER_THAN          : $actualOperator = '<'; break;
                    case FILTER_OPERATOR_LOWER_THAN_EQUALS   : $actualOperator = '<='; break;

                    case FILTER_OPERATOR_NOT_LIKE                : $actualOperator = 'not like'; break;
                    case FILTER_OPERATOR_NOT_EQUALS              : $actualOperator = '<>'; break;
                    case FILTER_OPERATOR_NOT_GREATER_THAN        : $actualOperator = '<='; break;
                    case FILTER_OPERATOR_NOT_GREATER_THAN_EQUALS : $actualOperator = '<'; break;
                    case FILTER_OPERATOR_NOT_LOWER_THAN          : $actualOperator = '>='; break;
                    case FILTER_OPERATOR_NOT_LOWER_THAN_EQUALS   : $actualOperator = '>'; break;
                }


                $this->builder->where(function($builder) use ($field, $operator, $actualOperator, $term) {

                    $termParts = explode(FILTER_OPERATOR_OR, $term);


                    foreach ($termParts as $termPart) {

                        if ($termPart === FILTER_VALUE_EMPTY) {

                            $termPart = '';
                        }

                        if ($termPart === FILTER_VALUE_NULL) {

                            $termPart = null;
                        }

                        if ($operator === FILTER_OPERATOR_EQUALS && in_array($termPart, ["true", "false"])) {

                            $termPart = filter_var($termPart, FILTER_VALIDATE_BOOLEAN);
                        }

                        foreach ($field as $actualField) {

                            $builder->orWhere(function($builder) use ($actualField, $operator, $actualOperator, $termPart) {

                                if (is_null($termPart)) {

                                    if ($operator == FILTER_OPERATOR_EQUALS) {

                                        $builder->whereNull($actualField);
                                    }

                                    if ($operator == FILTER_OPERATOR_NOT_EQUALS) {

                                        $builder->whereNotNull($actualField);
                                    }
                                }
                                else {

                                    if ($operator == FILTER_OPERATOR_LIKE || $operator == FILTER_OPERATOR_NOT_LIKE) {

                                        $termPart = '%' . wordwrap($termPart, 0, '%') . '%';
                                    }

                                    $builder->where($actualField, $actualOperator, $termPart);
                                }
                            });

                        }

                    }

                });
            }

        }

        $this->builder->select("{$mainTable}.*");

        $paginator = $this->model::paginate();
        $collection = $this->builder->get();
        $paginator = $paginator->setCollection($collection);

        return $paginator;
    }

    public function sort() {

        $random = $this->request->input('random', false);

        if ($random) {

            $this->builder = $this->builder->inRandomOrder();
        }

        $order_by = $this->request->input('order_by', []);

        $mainTable = $this->builder->getModel()->getTable();

        foreach ($order_by as $field => $operator) {

            $_operator = null;

            switch ($operator) {

                case 'desc' : $_operator = 'desc'; break;
                default     : $_operator = 'asc';
            }

            if (substr_count($field, '.')) {

                $parts = explode('.', $field);


                $fieldName = array_pop($parts);


                $lastJoinedTable = $mainTable;

                foreach ($parts as $table) {

                    $aliasId = uniqid();

                    $alias = "{$table}_{$aliasId}";

                    $this->builder->join("$table as {$alias}", "{$alias}.id", "{$lastJoinedTable}.{$table}_id");

                    $lastJoinedTable = $alias;

                    $field = "{$alias}.{$fieldName}";
                }
            }
            else {

                $field = "{$mainTable}.{$field}";
            }

            $this->builder = $this->builder->orderBy($field, $_operator);
        }

        return $this;
    }
}
