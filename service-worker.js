const dataCacheName = 'tesla-app-data';
const cacheName = 'tesla-app';
const filesToCache = [
    // '/',
    '/assets/images/icon.png',
    // '/favicon.ico',
    // '/index.php',
    '/404.html',
    '/OtherControls',
    '/Climate',
    '/Service',
    '/Planning',
    '/Security',
    '/Stats',
    '/Update',
    '/assets/css/style.css',
    '/assets/css/position.css',
    'https://unpkg.com/leaflet@1.3.1/dist/leaflet.js',
    'https://unpkg.com/leaflet@1.3.1/dist/leaflet.css'
];


// Étape 1 : installation du service worker
self.addEventListener('install', function (e) {
    console.log('[ServiceWorker] Install');
    e.waitUntil(
        caches.open(cacheName).then(function (cache) {
            console.log('[ServiceWorker] Caching app shell');
            return cache.addAll(filesToCache);
        })
    );
});

// Étape 2 : activation du service worker
self.addEventListener('activate', function (e) {
    console.log('[ServiceWorker] Activate');
    e.waitUntil(
        caches.keys().then(function (keyList) {
            return Promise.all(keyList.map(function (key) {
                if (key !== cacheName) {
                    console.log('[ServiceWorker] Removing old cache', key);
                    return caches.delete(key);
                }
            }));
        })
    );
    return self.clients.claim();
});

// Étape 3 : interception des requêtes réseau
self.addEventListener('fetch', function (e) {
    console.log('[Service Worker] Fetch', e.request.url);
    e.respondWith(
        caches.match(e.request).then(function (response) {
            if (response) {
                return response;
            }
            return fetch(e.request).catch(function () {
                console.log(e.request, "offline");
                self.clients.forEach((client) => {
                    client.postMessage('offline');
                });
            });
        })
    );
});
