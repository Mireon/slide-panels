/**
 * Plugin for getting paths.
 *
 * @type {Object}
 */
const Path = require('path');

/**
 * Plugin for coping files.
 *
 * @type {CopyPlugin}
 */
const CopyPlugin = require('copy-webpack-plugin');

/**
 * Plugin for extracting CSS styles into separate files.
 *
 * @type {CSSExtractPlugin}
 */
const CSSExtractPlugin = require('mini-css-extract-plugin');

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
const sourcePath = Path.resolve(__dirname, 'resources');

/**
 * The path to assets.
 *
 * @type {string}
 */
const assetsPath = Path.resolve(__dirname, 'resources/assets');

/**
 * The path to the public folder.
 *
 * @type {string}
 */
const publicPath = Path.resolve(__dirname, 'public');

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
    const config = {
        minimize: isProductionMode,
    };

    if (isProductionMode) {
        config.minimizer = [
            new TerserPlugin(),
            new OptimizeCSSPlugin({
                cssProcessor: require('cssnano'),
                cssProcessorPluginOptions: { preset: ['default', { discardComments: { removeAll: true }}]},
            }),
        ];
    }

    return config;
};

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
                plugins: ['@babel/plugin-proposal-object-rest-spread'],
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
        {
            loader: 'css-loader',
            options: {
                importLoaders: 1,
                modules: true,
            },
        },
        'sass-loader',
    ],
});

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
            '@scripts': Path.resolve(sourcePath, 'scripts'),
            '@styles': Path.resolve(sourcePath, 'styles'),
        },
    },
    devtool: isDevelopmentMode ? 'source-map' : false,
    optimization: optimization(),
    plugins: [
        new CopyPlugin([{ from: assetsPath, to: publicPath }]),
        new CSSExtractPlugin({ filename: 'styles/[name].css' }),
    ],
    module: {
        rules: [ jsRule(), scssRule() ],
    },
};
