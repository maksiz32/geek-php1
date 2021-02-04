<script>
    window.onload = function () {
        document.getElementById('start').onclick = function () {
            (async () => {
                const response = await fetch('jcalc.php', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        operation1: '2',
                        operation2: '4',
                        operationType: 'sum'
                    }),
                });
                const answer = await response.json();
                console.log(answer);
            })();
        }
    }
</script>