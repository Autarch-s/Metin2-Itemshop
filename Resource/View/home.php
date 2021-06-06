<?php /** @var $account \App\Model\Account */ ?>
<?php /** @var $characters [] */ ?>

<main role="main" class="container">
    <div class="itemWrapper" style="margin-top: 75px;">
        <div class="mainPage">
            <h5>Adatlap</h5>
            Felhasználónév: <?php echo $account->login; ?><br/>
            E-mail:  <?php echo $account->email; ?><br/>
            Számla egyenleg: <?php echo $account->cash; ?> DC<br/>
            Regisztráció:  <?php echo $account->create_time; ?><br/>
            Karaktertörlő kód:  <?php echo $account->social_id; ?><br/>
            Raktáros kód:  <?php echo $account->securitycode; ?><br/>
            <hr/>
            <h5>Karakterek</h5>
            <?php foreach($characters as $character) { ?>
                <?php echo $character->name; ?> - Lv.<?php echo $character->level; ?><br/>
            <?php } ?>
            <hr/>
        </div>
    </div>
</main>

<style>

    .mainPage {
        background-color: whitesmoke;
        border-radius: 3px;
        padding: 15px;
    }
</style>