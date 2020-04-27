/**
 * The configuration.
 *
 * @type {Object}
 */
module.exports = ({ file, options, env }) => ({
    syntax: 'postcss-scss',
    plugins: [
        require('autoprefixer'),
        require('css-mqpacker'),
    ],
});
