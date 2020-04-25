const path = require('path');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const MiniCSSExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCSSAssetsWebpackPlugin = require('optimize-css-assets-webpack-plugin');
const TerserWebpackPlugin = require('terser-webpack-plugin');

/**
 * The path to sources.
 *
 * @type {string}
 */
const sourcePath = path.resolve(__dirname, 'resources');

/**
 * The path to assets.
 *
 * @type {string}
 */
const assetsPath = path.resolve(__dirname, 'resources/assets');

/**
 * The path to the public folder.
 *
 * @type {string}
 */
const publicPath = path.resolve(__dirname, 'public');

/**
 * The mode.
 *
 * @type {string}
 */
const mode = process.env.NODE_ENV || 'development';

/**
 * The development mode indicator.
 *
 * @type {boolean}
 */
const isDevelopmentMode = mode === 'development';

/**
 * The production mode indicator.
 *
 * @type {boolean}
 */
const isProductionMode = mode === 'production';

/**
 * The optimization section.
 *
 * @returns {Object}
 */
const optimization = () => {
    const config = {};

    if (isProductionMode) {
        config.minimizer = [
            new OptimizeCSSAssetsWebpackPlugin(),
            new TerserWebpackPlugin(),
        ];
    }

    return config;
};

/**
 * The webpack configuration.
 *
 * @type {Object}
 */
module.exports = {
    mode,
    context: sourcePath,
    entry: {
        SlidePanels: './scripts/app.js',
    },
    output: {
        filename: 'scripts/[name].js',
        path: assetsPath,
        publicPath: '/',
    },
    resolve: {
        extensions: ['.js', '.scss'],
        alias: {
            '@scripts': path.resolve(sourcePath, 'scripts'),
            '@styles': path.resolve(sourcePath, 'styles'),
        },
    },
    devtool: isDevelopmentMode ? 'source-map' : null,
    optimization: optimization(),
    plugins: [
        new CopyWebpackPlugin([{ from: assetsPath, to: publicPath }]),
        new MiniCSSExtractPlugin({ filename: 'styles/[name].css' }),
    ],
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: [
                    {
                        loader: 'babel-loader',
                        options: {
                            presets: ['@babel/preset-env'],
                            plugins: ['@babel/plugin-proposal-object-rest-spread'],
                        },
                    },
                    'eslint-loader',
                ],
            },
            {
                test: /\.scss$/,
                use: [ MiniCSSExtractPlugin.loader, 'css-loader', 'sass-loader' ],
            },
        ],
    },
};
