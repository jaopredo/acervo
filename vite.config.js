import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                //---
                'resources/css/components/floating.scss',
                'resources/css/components/genericSelect.scss',
                'resources/css/components/loanState.scss',
                'resources/css/components/radio.scss',
                'resources/css/components/searchSelect.scss',
                'resources/css/components/uploadFile.scss',

                'resources/js/bookForm.js',
                'resources/js/group.js',
                'resources/js/layout.js',
                'resources/js/loans.js',
                'resources/js/tomb.js',
                //---
                'resources/js/components/deleteConfirmation.js',
                'resources/js/components/filter.js',
                'resources/js/components/multipleSelect.js',
                'resources/js/components/searchSelect.js',
                'resources/js/components/uploadFile.js',
            ],
            refresh: true,
        }),
    ],
});
