<?php

/* @var $this ItempengeluaranController */
/* @var $model ItemKeuangan */

$this->breadcrumbs = array(
	 'Item Keuangan' => array('index'),
	 'Index',
);

$this->boxHeader['small'] = 'Item Pengeluaran';
$this->boxHeader['normal'] = 'Item Pengeluaran';

$this->widget('BGridView', array(
	 'id' => 'item-keuangan-grid',
	 'dataProvider' => $model->search(),
	 'filter' => $model,
	 'columns' => array(
		  array(
				'name' => 'namaParent',
				'value' => 'is_null($data->parent) ? "": $data->parent->nama'
		  ),
		  array(
				'class' => 'BDataColumn',
				'name' => 'nama',
				'header' => '<span class="ak">N</span>ama',
				'accesskey' => 'n',
				'type' => 'raw',
				'value' => array($this, 'renderLinkToView')
		  ),
		  array(
				'class' => 'BButtonColumn',
		  ),
	 ),
));

$this->menu = array(
	 array('itemOptions' => array('class' => 'divider'), 'label' => ''),
	 array('itemOptions' => array('class' => 'has-form hide-for-small-only'), 'label' => '',
		  'items' => array(
				array('label' => '<i class="fa fa-plus"></i> <span class="ak">T</span>ambah', 'url' => $this->createUrl('tambah'), 'linkOptions' => array(
						  'class' => 'button',
					 )),
		  ),
		  'submenuOptions' => array('class' => 'button-group')
	 ),
	 array('itemOptions' => array('class' => 'has-form show-for-small-only'), 'label' => '',
		  'items' => array(
				array('label' => '<i class="fa fa-plus"></i>', 'url' => $this->createUrl('tambah'), 'linkOptions' => array(
						  'class' => 'button',
						  'accesskey' => 't'
					 )),
		  ),
		  'submenuOptions' => array('class' => 'button-group')
	 )
);
