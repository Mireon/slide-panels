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
const sourcePath = path.resolve(__dirname, 'src/frontend');

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
                presets: [
                    '@babel/preset-env',
                    '@babel/preset-typescript',
                ],
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
 * The rule for Typescript files.
 *
 * @returns {function}
 */
const tsRule = () => ({
    test: /\.ts$/,
    exclude: /node_modules/,
    use: 'ts-loader',
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
        library: 'SlidePanels',
    },
    resolve: {
        extensions: ['.js', '.ts', '.scss'],
        alias: {
            '@modules': path.resolve(sourcePath, 'scripts/Modules'),
            '@tools': path.resolve(sourcePath, 'scripts/Tools'),
            '@styles': path.resolve(sourcePath, 'styles'),
        },
    },
    plugins: [
        new CSSExtractPlugin({ filename: 'styles/[name].min.css' }),
    ],
    module: {
        rules: [ jsRule(), tsRule(), scssRule() ],
    },
};
