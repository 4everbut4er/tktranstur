<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 19.01.2016
 * Time: 15:32
 */

Breadcrumbs::register('admin', function($breadcrumbs)
{
    /** @var $breadcrumbs \DaveJamesMiller\Breadcrumbs\Generator */
    $breadcrumbs->push('Home', route('admin'));
});

Breadcrumbs::register('admin.dashboard', function($breadcrumbs)
{
    /** @var $breadcrumbs \DaveJamesMiller\Breadcrumbs\Generator */
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Рабочий стол', route('admin'));
});

Breadcrumbs::register('admin.services', function($breadcrumbs)
{
    /** @var $breadcrumbs \DaveJamesMiller\Breadcrumbs\Generator */
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Услуги', route('admin.services'));
});

Breadcrumbs::register('admin.news', function($breadcrumbs)
{
    /** @var $breadcrumbs \DaveJamesMiller\Breadcrumbs\Generator */
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Новости', route('admin.news'));
});

Breadcrumbs::register('admin.news.add', function($breadcrumbs)
{
    /** @var $breadcrumbs \DaveJamesMiller\Breadcrumbs\Generator */
    $breadcrumbs->parent('admin.news');
    $breadcrumbs->push('Добавить новость', route('admin.news.add'));
});

Breadcrumbs::register('admin.news.edit', function($breadcrumbs, $news)
{
    /** @var $breadcrumbs \DaveJamesMiller\Breadcrumbs\Generator */
    $breadcrumbs->parent('admin.news');
    $breadcrumbs->push('Редактировать новость', route('admin.news.edit', $news['id']));
});

Breadcrumbs::register('admin.catalog', function($breadcrumbs)
{
    /** @var $breadcrumbs \DaveJamesMiller\Breadcrumbs\Generator */
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Каталог', route('admin.catalog'));
});


Breadcrumbs::register('admin.catalog.add', function($breadcrumbs)
{
    /** @var $breadcrumbs \DaveJamesMiller\Breadcrumbs\Generator */
    $breadcrumbs->parent('admin.catalog');
    $breadcrumbs->push('Добавить технику', route('admin.catalog.add'));
});

Breadcrumbs::register('admin.catalog.edit', function($breadcrumbs, $entity)
{
    /** @var $breadcrumbs \DaveJamesMiller\Breadcrumbs\Generator */
    $breadcrumbs->parent('admin.catalog');
    $breadcrumbs->push('Редактировать технику', route('admin.catalog.edit', $entity['id']));
});

Breadcrumbs::register('admin.users', function($breadcrumbs)
{
    /** @var $breadcrumbs \DaveJamesMiller\Breadcrumbs\Generator */
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Пользователи', route('admin.users'));
});

Breadcrumbs::register('admin.review', function($breadcrumbs)
{
    /** @var $breadcrumbs \DaveJamesMiller\Breadcrumbs\Generator */
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Отзывы', route('admin.review'));
});

Breadcrumbs::register('admin.review.add', function($breadcrumbs)
{
    /** @var $breadcrumbs \DaveJamesMiller\Breadcrumbs\Generator */
    $breadcrumbs->parent('admin.review');
    $breadcrumbs->push('Добавить отзыв', route('admin.review.add'));
});

Breadcrumbs::register('admin.review.edit', function($breadcrumbs, $obj)
{
    /** @var $breadcrumbs \DaveJamesMiller\Breadcrumbs\Generator */
    $breadcrumbs->parent('admin.review');
    $breadcrumbs->push('Редактировать отзыв', route('admin.review.edit', $obj['id']));
});


