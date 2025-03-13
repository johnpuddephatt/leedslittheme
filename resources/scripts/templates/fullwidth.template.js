export function template() {
  return [
    // wp.blocks.createBlock('core/post-title', {}),
    // wp.blocks.createBlock('core/post-featured-image', {
    //   align: '',
    //   lock: {
    //     move: true,
    //     remove: true,
    //   },
    // }),
    wp.blocks.createBlock('acf/hero', {
      data: {
        field_hero_background_colour: 'green-light',
        field_hero_heading: 'Section title',
        field_hero_content: 'Section introduction.',
        field_hero_buttons: '',
        field_hero_image: '',
      },
      align: '',
      mode: 'preview',
      lock: {
        move: true,
        remove: true,
      },
    }),
  ];
}
