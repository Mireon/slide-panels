/**
 * Plugin for getting paths.
 *
 * @type {Object}
 */
const path = require('path');

/**
 * Plugin for extracting CSS styles into separate files.
 *
 * @type {CSSExtractPlugin}
 */
const CSSExtractPlugin = require('mini-css-extract-plugin');

/**
 * The path to sources.
 *
 * @type {string}
 */
const sourcePath = path.resolve(__dirname, 'resources/assets');

/**
 * The rule for JS files.
 *
 * @returns {function}
 */
const jsRule = () => ({
    test: /\.js$/,
    exclude: /node_modules/,
    use: [
        {
            loader: 'babel-loader',
            options: {
                presets: ['@babel/preset-env'],
                plugins: [
                    '@babel/plugin-proposal-object-rest-spread',
                    '@babel/plugin-proposal-class-properties',
                ],
            },
        },
        'eslint-loader',
    ],
});

/**
 * The rule for SCSS files.
 *
 * @returns {function}
 */
const scssRule = () => ({
    test: /\.scss$/,
    use: [
        CSSExtractPlugin.loader,
        'css-loader',
        'postcss-loader',
        'sass-loader',
    ],
});

/**
 * The configuration.
 *
 * @type {Object}
 */
module.exports = {
    context: sourcePath,
    entry: {
        'slide-panels': './scripts/slide-panels.js',
    },
    output: {
        publicPath: '/',
        filename: 'scripts/[name].js',
    },
    resolve: {
        extensions: ['.js', '.scss'],
        alias: {
            '@scripts': path.resolve(sourcePath, 'scripts'),
            '@styles': path.resolve(sourcePath, 'styles'),
        },
    },
    plugins: [
        new CSSExtractPlugin({ filename: 'styles/[name].css' }),
    ],
    module: {
        rules: [ jsRule(), scssRule() ],
    },
};
