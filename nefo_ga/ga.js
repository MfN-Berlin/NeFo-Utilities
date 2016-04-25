// normaler GA-Code
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

// gaProperty auf die zu untersuchende Seite setzten
var gaProperty = 'UA-48213470-3';
ga('create', gaProperty, 'www.biodiversity.de');

//Uncomment next line and comment above line for testing on local dev
//ga('create', gaProperty, {'cookieDomain': 'none'});

// In-Page-Analyse: Erweiterte Linkzuordnung taggen

ga('require', 'linkid');

// Tracking deaktivieren, wenn opt-out Cookie gesetzt
var disableStr = 'ga-disable-' + gaProperty;
if (document.cookie.indexOf(disableStr + '=true') > -1) {
    window[disableStr] = true;
}
// opt-out Cookie setzen
function gaOptout() {
    document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
    window[disableStr] = true;
}
// diese Property nicht verändern! Eine zweite Property für all-Profil wird erstellt
ga('create', 'UA-48213470-6', 'all.naturkundemuseum-berlin.de', {'name': 'combined'});

// IPs anonymisieren = datenschutzkonform
ga('set', 'anonymizeIp', true);

// Daten an beide Tracker übermitteln
ga('send', 'pageview');
ga('combined.send', 'pageview');
