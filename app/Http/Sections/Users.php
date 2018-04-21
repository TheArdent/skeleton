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
 * Class Users
 *
 * @property \Modules\Users\Entities\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Users extends Section
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
	protected $title = 'Users';

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
			                   AdminColumn::text('id', '#')->setWidth('30px'),
			                   AdminColumn::text('name', 'Name')->setWidth('100px'),
			                   AdminColumn::text('email', 'Email')->setWidth('100px')
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
				AdminFormElement::text('email', 'Email')->required(),
				AdminFormElement::password('password', 'Password')->required()->hashWithBcrypt()
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
