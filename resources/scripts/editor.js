const { subscribe, select, dispatch } = wp.data;
import { template as fullwidthTemplate } from './templates/fullwidth.template.js';
/**
 * @see {@link https://bud.js.org/extensions/bud-preset-wordpress/editor-integration/filters}
 */
roots.register.filters('@scripts/filters');

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);

// Close all ACF flexible layouts by default.
document
  .querySelectorAll('.acf-flexible-content .layout')
  .forEach((elem) => elem.classList.add('-collapsed'));

let currentTemplate;

window.tribe_l10n_datatables = {};

wp.domReady(function () {
  wp.data.subscribe(() => {
    if (
      currentTemplate !==
      select('core/editor').getEditedPostAttribute('template')
    ) {
      currentTemplate =
        select('core/editor').getEditedPostAttribute('template');

      if (window.templateIsSet && confirm('Reset page content?') === true) {
        if (currentTemplate === 'template-fullwidth.blade.php') {
          wp.data
            .dispatch('core/editor')
            .resetEditorBlocks(fullwidthTemplate());
        }
        if (!currentTemplate) {
          wp.data.dispatch('core/editor').resetEditorBlocks([]);
        }
      }
      window.templateIsSet = true;
    }
  });

  wp.blocks.unregisterBlockType('core/verse');
  wp.blocks.unregisterBlockType('core/cover');
  wp.blocks.unregisterBlockType('core/file');
  // wp.blocks.unregisterBlockType('core/more');
  wp.blocks.unregisterBlockType('core/code');
  wp.blocks.unregisterBlockType('core/social-links');
  wp.blocks.unregisterBlockType('core/nextpage');
  wp.blocks.unregisterBlockType('core/preformatted');

  wp.blocks.unregisterBlockType('core/embed');
  wp.blocks.unregisterBlockType('core/archives');
  wp.blocks.unregisterBlockType('core/categories');
  wp.blocks.unregisterBlockType('core/calendar');
  wp.blocks.unregisterBlockType('core/tag-cloud');
  wp.blocks.unregisterBlockType('core/rss');
  wp.blocks.unregisterBlockType('core/search');
  wp.blocks.unregisterBlockType('core/shortcode');
  wp.blocks.unregisterBlockType('core/latest-posts');
  // wp.blocks.unregisterBlockType('core/latest-comments');
  wp.blocks.unregisterBlockType('core/spacer');
});
