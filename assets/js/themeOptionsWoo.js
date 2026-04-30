document.addEventListener('DOMContentLoaded', function () {

    const buttons = document.querySelectorAll('.minute-button');
    const input = document.getElementById('selected_minute');

    if (!buttons.length || !input || typeof minute_ajax === 'undefined') return;

    const productId = minute_ajax.product_id;

    buttons.forEach(btn => {
        btn.addEventListener('click', function () {
            if (this.disabled) return;

            buttons.forEach(b => b.classList.remove('selected'));
            this.classList.add('selected');
            input.value = this.dataset.minute;
        });
    });

    function refreshMinutes() {
        const formData = new FormData();
        formData.append('action', 'get_taken_minutes');
        formData.append('product_id', productId);

        fetch(minute_ajax.ajax_url, {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (!data.success) return;

            const taken = data.data.map(Number);

            buttons.forEach(btn => {
                const minute = parseInt(btn.dataset.minute);

                if (taken.includes(minute)) {
                    btn.disabled = true;
                    btn.classList.remove('selected');

                    if (input.value == minute) {
                        input.value = '';
                    }
                } else {
                    btn.disabled = false;
                }
            });
        });
    }

    // Auf Varianten-Wechsel reagieren
    document.addEventListener('change', function(e) {
        // Reagiere auf Änderungen in Varianten-Select-Feldern
        if (e.target.closest('.variations_form') && e.target.name.includes('attribute_')) {
            // Kurze Verzögerung, um sicherzustellen, dass Daten aktualisiert sind
            setTimeout(refreshMinutes, 100);
        }
    });

    // Reagiere auch auf custom Events (manche Themes verwenden diese)
    document.addEventListener('woocommerce_variation_select_change', function() {
        setTimeout(refreshMinutes, 100);
    });

    refreshMinutes();
    setInterval(refreshMinutes, 5000);


    
});

