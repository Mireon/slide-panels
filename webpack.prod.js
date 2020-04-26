/**
 * Plugin for getting paths.
 *
 * @type {Object}
 */
const path = require('path');

/**
 * Library for merging Webpack configs.
 *
 * @type {Object}
 */
const merge = require('webpack-merge');

/**
 * The common config.
 *
 * @type {Object}
 */
const common = require('./webpack.common.js');

/**
 * Plugin to minify CSS styles.
 *
 * @type {OptimizeCSSPlugin}
 */
const OptimizeCSSPlugin = require('optimize-css-assets-webpack-plugin');

/**
 * Plugin to minify JS scripts.
 *
 * @type {TerserPlugin}
 */
const TerserPlugin = require('terser-webpack-plugin');

/**
 * The path to sources.
 *
 * @type {string}
 */
const sourcePath = path.resolve(__dirname, 'resources/assets');

/**
 * The configuration.
 *
 * @type {Object}
 */
module.exports = merge(common, {
    mode: 'production',
    output: {
        path: sourcePath,
        filename: 'scripts/[name].min.js',
    },
    optimization: {
        minimize: true,
        minimizer: [
            new TerserPlugin(),
            new OptimizeCSSPlugin({
                cssProcessor: require('cssnano'),
                cssProcessorPluginOptions: { preset: ['default', { discardComments: { removeAll: true }}]},
            }),
        ],
    },
});
