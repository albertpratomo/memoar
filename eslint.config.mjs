import antfu from '@antfu/eslint-config';

export default antfu(
    {
        ignores: [
            'public/',
        ],
        stylistic: {
            indent: 4,
            semi: true,
        },
        vue: true,
    },
    {
        files: ['**/*.vue'],
        rules: {
            'vue/padding-line-between-tags': ['error', [
                { blankLine: 'always', prev: '*', next: '*' },
            ]],
        },
    },
);
