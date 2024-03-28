const path = require('path');
const { argv } = require('yargs');
const { merge } = require('webpack-merge');

const desire = require('./util/desire');

const glob = require("glob");
const fs = require('fs');

const userConfig = merge(desire(`${__dirname}/../config`), desire(`${__dirname}/../config-local`) ? desire(`${__dirname}/../config-local`) : {});

const isProduction = argv.mode == 'production';
const rootPath = (userConfig.paths && userConfig.paths.root)
  ? userConfig.paths.root
  : process.cwd();


// obtain asset paths from modules
var acf_blocks = glob.sync(path.join(rootPath, 'acf-blocks/*'));
var asset_paths = [];
const block_export_entries = [];
for (const [key, path] of Object.entries(acf_blocks)) {
  var split_path = path.split("/");
  var last_dir = split_path[split_path.length - 1];
  if(process.platform === "win32") {
    asset_paths.push(path.replace(/\//g, "\\") + '\\assets');
  } else {
    asset_paths.push(path.replace(/\//g, "/") + '/assets');
  }
  var assets = {'js': path + '/assets/scripts/script.js', 'scss': path + '/assets/styles/styles.scss'};
  const a_obj = [];
  for (const [a_key, a_path] of Object.entries(assets)) {
    try {
      fs.accessSync(a_path, fs.constants.R_OK | fs.constants.W_OK);
      a_obj.push(a_path);
    } catch (err) {
      console.error('File does not exist: ' + a_path);
    }
  }
  if(Object.keys(a_obj).length > 0){
    block_export_entries['acf-blocks/' + last_dir] = a_obj;
  }
}




const config = merge({
  open: true,
  copy: 'images/**/*',
  proxyUrl: 'http://localhost:8888',
  cacheBusting: '[name]_[contenthash]',
  paths: {
    root: rootPath,
    assets: path.join(rootPath, 'assets'),
    dist: path.join(rootPath, 'dist'),
  },
  enabled: {
    sourceMaps: !isProduction,
    optimize: isProduction,
    cacheBusting: isProduction,
    watcher: !!argv.watch,
  },
  watch: [],
}, userConfig);

module.exports = merge(config, {
  env: Object.assign({ production: isProduction, development: !isProduction }, argv.mode),
  publicPath: `${config.publicPath}/${path.basename(config.paths.dist)}/`,
  manifest: {},
});

if (process.env.NODE_ENV === undefined) {
  process.env.NODE_ENV = isProduction ? 'production' : 'development';
}

/**
 * If your publicPath differs between environments, but you know it at compile time,
 * then set SAGE_DIST_PATH as an environment variable before compiling.
 * Example:
 *   SAGE_DIST_PATH=/wp-content/themes/sage/dist/ yarn build:production
 */
if (process.env.SAGE_DIST_PATH) {
  module.exports.publicPath = process.env.SAGE_DIST_PATH;
}


// push in acf block entries
for (const [key, value] of Object.entries(block_export_entries)) {
  module.exports.entry[key] = value;
}

/**
 * If you don't know your publicPath at compile time, then uncomment the lines
 * below and use WordPress's wp_localize_script() to set SAGE_DIST_PATH global.
 * Example:
 *   wp_localize_script('sage/main.js', 'SAGE_DIST_PATH', get_theme_file_uri('dist/'))
 */
// Object.keys(module.exports.entry).forEach(id =>
//   module.exports.entry[id].unshift(path.join(__dirname, 'helpers/public-path.js')));
