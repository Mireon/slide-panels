/**
 * Library for getting paths.
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
 * Plugin for coping files.
 *
 * @type {CopyPlugin}
 */
const CopyPlugin = require('copy-webpack-plugin');

/**
 * The path to assets.
 *
 * @type {string}
 */
const sourcePath = path.resolve(__dirname, 'resources/assets');

/**
 * The path to the public folder.
 *
 * @type {string}
 */
const publicPath = path.resolve(__dirname, 'public');

/**
 * The configuration.
 *
 * @type {Object}
 */
module.exports = merge(common, {
    mode: 'development',
    output: {
        path: publicPath,
    },
    devtool: 'source-map',
    plugins: [
        new CopyPlugin([
            { from: `${sourcePath}/images`, to: `${publicPath}/images` },
            { from: `${sourcePath}/fonts`, to: `${publicPath}/fonts` },
        ]),
    ],
});
