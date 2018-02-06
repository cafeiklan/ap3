<?php
    /* @var $this PoController */
    /* @var $model Po */

    $this->breadcrumbs = [
        'PO'       => ['index'],
        $model->id => ['view', 'id' => $model->id],
        'Ubah',
    ];

    $this->boxHeader['small']  = 'Ubah';
    $this->boxHeader['normal'] = "Ubah PO";

    $this->pageTitle = Yii::app()->name . ' - ' . $this->boxHeader['normal'];
?>
<div class="row">
    <div class="medium-5 large-5 columns">
        <?php
            echo CHtml::ajaxLink('<i class="fa fa-floppy-o"></i> <span class="ak">S</span>impan PO', $this->createUrl('simpan', ['id' => $model->id]), [
                'data'       => "simpan=true",
                'type'       => 'POST',
                'beforeSend' => 'function() {
                            $("#tombol-simpan").addClass("warning");
                            $("#tombol-simpan").html("<i class=\"fa fa-floppy-o fa-spin\"></i> <span class=\"ak\">S</span>impan PO");
                        }',
                'complete'   => 'function() {
                            $("#tombol-simpan").removeClass("warning");
                        }',
                'success'    => 'function(data) {
                        if (data.sukses) {
                            location.reload();;
                        }
                    }',
            ], [
                'class'     => 'tiny bigfont button',
                'accesskey' => 's',
                'id'        => 'tombol-simpan',
            ]
            );

            echo CHtml::link('<i class="fa fa-times"></i> Bata<span class="ak">l</a>', $this->createUrl('hapus', ['id' => $model->id]), [
                'class'     => 'alert tiny bigfont button',
                'accesskey' => 'l',
            ]);
        ?>

    </div>
    <div class="medium-7 large-7 columns header" style="text-align: right">
        <span class="secondary label">Supplier</span><span class="label"><?php echo $model->profil->nama; ?></span>
        <span class="secondary label">Reff</span><span class="label"><?php echo empty($model->referensi) ? '-' : $model->referensi; ?></span><span class="success label"><?php echo empty($model->tanggal_referensi) ? '-' : $model->tanggal_referensi; ?></span>
        <span class="secondary label">Total</span><span class="label" id="total-po"><?=$model->total;?></span>
    </div>
</div>
<div class="row">
    <?php
        if ($pilihBarang) {
            $this->renderPartial('_pilih_barang', [
                'pembelianModel' => $model,
                'barangBarcode'  => $barangBarcode,
                'barangNama'     => $barangNama,
                'barang'         => $barang,
                'barangList'     => $barangList,
                'curSupplierCr'  => $curSupplierCr,
                'tipeCari'       => $tipeCari,
            ]);
        }
    ?>
</div>
<div class="row">
    <?php
        $this->renderPartial('_detail', [
            'po'          => $model,
            'PODetail'    => $PODetail,
            'pilihBarang' => $pilihBarang,
        ]);
    ?>
</div>
<script>
    function updateTotal() {
        var dataurl = "<?php echo $this->createUrl('total', ['id' => $model->id]); ?>";
        $.ajax({
            url: dataurl,
            type: "GET",
            success: function (data) {
                if (data.sukses) {
                    $("#total-po").text(data.totalF);
                    console.log(data.totalF);
                }
            }
        });
    }
</script>
<?php
    $this->menu = [
        ['itemOptions' => ['class' => 'divider'], 'label' => false],
        ['itemOptions'   => ['class' => 'has-form hide-for-small-only'], 'label' => false,
            'items'          => [
                ['label' => '<i class="fa fa-plus"></i> <span class="ak">T</span>ambah', 'url' => $this->createUrl('tambah'), 'linkOptions' => [
                    'class'     => 'button',
                    'accesskey' => 't',
                ]],
                ['label' => '<i class="fa fa-asterisk"></i> <span class="ak">I</span>ndex', 'url' => $this->createUrl('index'), 'linkOptions' => [
                    'class'     => 'success button',
                    'accesskey' => 'i',
                ]],
            ],
            'submenuOptions' => ['class' => 'button-group'],
        ],
        ['itemOptions'   => ['class' => 'has-form show-for-small-only'], 'label' => false,
            'items'          => [
                ['label' => '<i class="fa fa-plus"></i>', 'url' => $this->createUrl('tambah'), 'linkOptions' => [
                    'class' => 'button',
                ]],
                ['label' => '<i class="fa fa-asterisk"></i>', 'url' => $this->createUrl('index'), 'linkOptions' => [
                    'class' => 'success button',
                ]],
            ],
            'submenuOptions' => ['class' => 'button-group'],
    ],
];