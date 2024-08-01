<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use A17\Twill\Models\Contracts\TwillModelContract;

use A17\Twill\Services\Forms\{
    Fields\Input,
    Fields\Wysiwyg,
    Form
};
use A17\Twill\Services\Listings\{
    Columns\Text,
    TableColumns
};

class ArticleController extends BaseModuleController
{
    protected $moduleName = 'articles';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        /**
         * We set our permalinkBase to an empty string instead of letting it default to the name of our model which is pages
         * Then we add withoutLanguageInPermalink to tell the controller to not use the language permalink.
         * From: https://twillcms.com/guides/page-builder-with-blade/configuring-the-page-module.html
         */
        $this->setPermalinkBase('');
        $this->withoutLanguageInPermalink();
    }

    public function getCreateForm(): Form
    {
        return Form::make([

            Input::make()
                ->name('slug')
                ->label(twillTrans('twill::lang.modal.permalink-field'))
                ->translatable()
                ->note('Some note')
                ->ref('permalink')
                ->prefix($this->getPermalinkPrefix($this->getPermalinkBaseUrl())),
        ]);
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(

            Wysiwyg::make()
                ->label('Content')
                ->name('description')
                ->toolbarOptions([['header' => [1, 2, false]], 'ordered', 'bullet'])
                ->maxLength(200)
                ->note('Some note')
                ->translatable(true),

            Input::make()
                ->name('slug')
                ->label(twillTrans('twill::lang.modal.permalink-field'))
                ->translatable()
                ->note('Some note')
                ->ref('permalink')
                ->prefix($this->getPermalinkPrefix($this->getPermalinkBaseUrl())),
        );

        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()->field('description')->title('Description')
        );

        return $table;
    }
}
