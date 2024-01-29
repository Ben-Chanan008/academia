if('serviceWorker' in navigator)
    navigator.serviceWorker.register('../sw.js').then(reg => console.log('service is registered', reg)).catch(err => console.log('not registered', err));
