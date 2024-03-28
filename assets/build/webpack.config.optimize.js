'use strict'; // eslint-disable-line

const { default: ImageminPlugin } = require('imagemin-webpack-plugin');
const imageminMozjpeg = require('imagemin-mozjpeg');
const TerserPlugin = require('terser-webpack-plugin');
const whitelister = require('purgecss-whitelister');
const glob = require('glob-all');
const PurgecssPlugin = require('purgecss-webpack-plugin');

const config = require('./config');

let purge_css_exclude_css = ['html', 'body', /^hidden/, /^open/, /^visible/, /^active/];
let purge_css_exclude_files = whitelister([
    'acf-blocks/**/assets/styles/styles.scss',
    'assets/styles/common/*.scss',
    'assets/styles/blocks/*.scss',
    'assets/styles/components/*.scss',
    'assets/styles/*.scss',
]);

module.exports = {
    plugins: [
        new ImageminPlugin({
            optipng: { optimizationLevel: 2 },
            gifsicle: { optimizationLevel: 3 },
            pngquant: { quality: '65-90', speed: 4 },
            svgo: {
                plugins: [
                    { removeUnknownsAndDefaults: false },
                    { cleanupIDs: true },
                    { removeViewBox: false },
                    { moveGroupAttrsToElems: true },
                    { collapseGroups: true },
                ],
            },
            plugins: [imageminMozjpeg({ quality: 75 })],
            disable: (config.enabled.watcher),
        }),
        new PurgecssPlugin({
            paths: glob.sync([
                'acf-blocks/**/*.php',
                'templates/**/*.php',
                'woocommerce/**/*.php',
                'page.php',
                'base.php',
                'single.php',
                '404.php',
                'index.php',
                'search.php',
            ]),
            safelist: purge_css_exclude_css.concat(purge_css_exclude_files),
        }),
    ],
    optimization: {
        minimize: true,
        minimizer: [
            new TerserPlugin({
                extractComments: false,
            }),
        ],
    },
};
