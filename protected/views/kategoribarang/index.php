<?php

/* @var $this KategoribarangController */
/* @var $model KategoriBarang */

$this->breadcrumbs = array(
    'Kategori Barang' => array('index'),
    'Index',
);

$this->boxHeader['small'] = 'Kategori Barang';
$this->boxHeader['normal'] = 'Kategori Barang';
?>
<?php

$this->widget('BGridView', array(
    'id' => 'kategori-barang-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'class' => 'BDataColumn',
            'name' => 'nama',
            'header' => '<span class="ak">N</span>ama',
            'accesskey' => 'n',
            'type' => 'raw',
            'value' => array($this, 'renderLinkToView'),
        ),
        array(
            'class' => 'BButtonColumn',
        ),
    ),
));
?>

<?php

$this->menu = array(
    array('itemOptions' => array('class' => 'divider'), 'label' => ''),
    array('itemOptions' => array('class' => 'has-form hide-for-small-only'), 'label' => '',
        'items' => array(
            array('label' => '<i class="fa fa-plus"></i> <span class="ak">T</span>ambah', 'url' => $this->createUrl('tambah'), 'linkOptions' => array(
                    'class' => 'button',
                    'accesskey' => 't'
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
