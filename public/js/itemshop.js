let itemshop = {
    buy: function(itemId) {
        let itemAmount = $(`#itemAmount-${itemId}`).val();

        let parameters = {
            itemId: itemId,
            itemAmount: itemAmount
        };

        $.get('/itemshop/buy', parameters, function(response) {
            if(response.msg) {
                alert(response.msg);
            } else {
                alert('Hiba történt a vásárlásban!');
            }
        }, 'json');
    }
}