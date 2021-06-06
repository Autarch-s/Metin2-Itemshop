<?php /** @var $itemShopItems array */ ?>

<main role="main" class="container">
    <div class="itemWrapper">

        <div class="container">
            <div class="row">
                <?php foreach($itemShopItems as $itemId=>$itemName) { ?>
                    <div class="card item" style="width: 11rem;">
                        <img class="card-img-top itemImage" src="/public/images/items/<?php echo $itemId; ?>.png" alt="<?php echo $itemName . ' - Kép'; ?>"/>
                        <div class="card-body">
                            <h5 class="card-title itemPriceCenter"><?php echo $itemName; ?></h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item itemPriceCenter">
                                    0 SÉ/<?php echo \App\Constant\ItemsConst::getItemShopItemAmount($itemId); ?>db
                                </li>
                                <li class="list-group-item itemAmountCenter">
                                    <select id="itemAmount-<?php echo $itemId; ?>" name="itemAmount-<?php echo $itemId; ?>">
                                        <?php foreach(\App\Constant\ItemsConst::getAvailableItemAmount() as $amount) { ?>
                                            <option value="<?php echo $amount; ?>"><?php echo $amount; ?></option>
                                        <?php } ?>
                                    </select>
                                </li>
                                <li class="list-group-item buttonCenter">
                                    <a href="#" class="btn btn-primary" onclick="itemshop.buy(<?php echo $itemId; ?>);">Vásárlás</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<style>
    .itemWrapper {
        margin-top: 75px;
    }

    .itemWrapper .item {
        margin: 15px;
    }

    .itemWrapper .itemImage {
        height: 160px !important;
        width: 100% !important;
    }

    .itemWrapper .card-title {
        height:75px;
    }

    .itemWrapper .itemAmountCenter {
        margin-left: 30px;
    }

    .itemWrapper .itemPriceCenter {
        text-align: center;
    }

    .itemWrapper .buttonCenter {
        margin-left: 15px;
    }
</style>