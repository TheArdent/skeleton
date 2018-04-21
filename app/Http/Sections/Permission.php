<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Permission
 *
 * @property \Modules\Users\Entities\Permission $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Permission extends Section
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = 'Permission';

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
	public function onDisplay()
	{
		return AdminDisplay::table()
		                   ->setColumns(
			                   AdminColumn::text('name', 'Name')->setWidth('100px'),
			                   AdminColumn::text('display_name', 'Display Name')->setWidth('100px'),
			                   AdminColumn::text('description', 'Description')->setWidth('100px')
		                   )->paginate(20);
	}

	/**
	 * @param int $id
	 *
	 * @return FormInterface
	 */
	public function onEdit($id)
	{
		return AdminForm::panel()->addBody(
			[
				AdminFormElement::text('name', 'Name')->required(),
				AdminFormElement::text('display_name', 'Display Name'),
				AdminFormElement::textarea('description', 'Description')
			]
		);
	}

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
