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
});
