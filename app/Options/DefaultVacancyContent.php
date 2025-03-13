<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class DefaultVacancyContent extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Default Vacancy Content';

    /**
     * The option page menu slug.
     *
     * @var string
     */
    public $slug = 'vacancy-content';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Default Vacancy Content | Options';



    /**
     * The slug of another admin page to be used as a parent.
     *
     * @var string
     */
    public $parent = 'theme-options';


    /**
     * The option page field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('default_vacancy_content');


        $fields
            ->addRepeater(
                'default_vacancy_sections',
                [
                    'label' => 'Application content',
                    'layout' => 'block',
                ]
            )

            ->addText('title')
            ->addWysiwyg('content', [
                'toolbar' => 'simple',
            ])
            ->endRepeater()
            ->addRepeater(
                'default_vacancy_faqs',
                [
                    'label' => 'Application FAQs',
                    'layout' => 'block',
                ]
            )

            ->addText('title')
            ->addWysiwyg('content', [
                'toolbar' => 'simple',
            ])
            ->endRepeater();

        return $fields->build();
    }
}
