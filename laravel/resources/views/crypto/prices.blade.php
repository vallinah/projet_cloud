<div class="contains">
    <h1 id="page">Crypto Market Live <span>Mis à jour le 11/12/2023</span></h1>
    <div class="dash">
        <div class="card" style="background-color: rgb(0, 255, 255);">
            <h2>Market Cap Total</h2>
            <p id="total-market-cap">5,678 <span>US</span></p>
        </div>
        <div class="card" style="background-color: rgb(255, 247, 0);">
            <h2>Volume 10s</h2>
            <p id="total-volume">10,678, <span>US</span></p>
        </div>
        <div class="card" style="background-color: rgb(255, 255, 255);">
            <h2>BTC Dominance</h2>
            <p id="btc-dominance">99,8 <span>%</span></p>
        </div>
        <div class="card" style="background-color: rgb(255, 255, 255);">
            <h2>Cryptos Tracked</h2>
            <p id="crypto-count">10 </p>
        </div>
    </div>
    <div class="classement">
        <table>
            <thead>
                <tr>
                    <th>RANG</th>
                    <th>CRYPTO</th>
                    <th>PRIX</th>
                    <th>10 %</th>
                    <th>VOLUME 10 SEC</th>
                    <th>GRAPHIQUE</th>
                </tr>
            </thead>
            <tbody id="crypto-tbody">
            </tbody>
        </table>

    </div>
    <div class="chart">
        <canvas id="myChart" width="50px" height="50px"></canvas>
        <canvas id="Chart2" width="50px" height="50px"></canvas>
    </div>
</div>

<script>
    let priceHistory = {};
    let charts = {};

    function formatPrice(price) {
        if (price >= 1) return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'USD',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(price);

        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'USD',
            minimumFractionDigits: 6,
            maximumFractionDigits: 6
        }).format(price);
    }

    function updatePrices() {
        fetch('/api/crypto/prices')
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById('crypto-tbody');
                tbody.innerHTML = '';

                let totalMarketCap = 0;
                let totalVolume = 0;

                data.forEach((crypto, index) => {
                    if (!priceHistory[crypto.crypto_id]) {
                        priceHistory[crypto.crypto_id] = {
                            prices: [crypto.current_price],
                            lastPrice: crypto.current_price
                        };
                    }

                    const priceChange = crypto.current_price - priceHistory[crypto.crypto_id].lastPrice;
                    const priceChangeClass = priceChange > 0 ? 'price-up' : priceChange < 0 ? 'price-down' : '';

                    // Mettre à jour l'historique
                    priceHistory[crypto.crypto_id].prices.push(crypto.current_price);
                    if (priceHistory[crypto.crypto_id].prices.length > 20) {
                        priceHistory[crypto.crypto_id].prices.shift();
                    }
                    priceHistory[crypto.crypto_id].lastPrice = crypto.current_price;

                    const row = document.createElement('tr');
                    row.className = `hover:bg-gray-200 ${priceChangeClass}`;

                    row.innerHTML = `
                            <td>${index + 1}</td>
                            <td><strong>${crypto.name}</strong><br>${crypto.symbol}</td>
                            <td>${formatPrice(crypto.current_price)} $US</td>
                            <td class="positive">${(priceChange / priceHistory[crypto.crypto_id].lastPrice * 100).toFixed(2)}%</td>
                            <td>$${(crypto.current_price * 1000).toLocaleString()}</td>
                            <td><canvas id="chart${crypto.crypto_id}"</canvas></td>
                        `;

                    tbody.appendChild(row);

                    // Mettre à jour le graphique
                    updateChart(crypto.crypto_id);

                    // Calculer les totaux
                    totalMarketCap += crypto.current_price * 1000;
                    totalVolume += crypto.current_price * 1000 * 0.1;
                });

                // Mettre à jour les métriques globales
                document.getElementById('total-market-cap').textContent =
                    new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'USD', maximumFractionDigits: 0 })
                        .format(totalMarketCap);
                document.getElementById('total-volume').textContent =
                    new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'USD', maximumFractionDigits: 0 })
                        .format(totalVolume);
                document.getElementById('btc-dominance').textContent =
                    ((data[0].current_price * 1000 / totalMarketCap) * 100).toFixed(1) + '%';
                document.getElementById('crypto-count').textContent = data.length;
                document.getElementById('last-update').textContent =
                    `Dernière mise à jour : ${new Date().toLocaleTimeString()}`;
            })
            .catch(error => console.error('Erreur:', error));
    }

    function updateChart(cryptoId) {
        const ctx = document.getElementById(`chart-${cryptoId}`);

        if (charts[cryptoId]) {
            charts[cryptoId].destroy();
        }

        const prices = priceHistory[cryptoId].prices;
        const labels = Array(prices.length).fill('');

        charts[cryptoId] = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    data: prices,
                    borderColor: prices[prices.length - 1] >= prices[0] ? '#34D399' : '#F87171',
                    borderWidth: 2,
                    tension: 0.4,
                    pointRadius: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: false, ticks: { maxTicksLimit: 5 } },
                    x: { display: false }
                }
            }
        });
    }
    setInterval(updatePrices, 10000);

    updatePrices();  
</script>
</body>

</html>