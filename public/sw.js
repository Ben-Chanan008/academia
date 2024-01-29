const staticCacheName = 'site-static';

const assets = [
  '/',
    '/js/app.js',
    '/js/main.js',
    '/js/form-validator.js',
    '/css/style.css',
    '/plugins/bootstrap/css/bootstrap.css',
    '/plugins/fontawesome/css/all.css',
    '/images/user-img.png',
    '/meta/favicon/favicon.ico'
];
self.addEventListener('install', e => {
    e.waitUntil(
        caches.open(staticCacheName).then(cache => {
            console.log('caching all assets');
            cache.addAll(assets);
        })
    );

});
//active

self.addEventListener('activate', (e) => {
    console.lo(e.request)
 e.respondWith(
     caches.match(e.request).then(cacheRes => {
         console.log('returning')
         return cacheRes || fetch(e.request);
     })
 )
});
