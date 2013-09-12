function Enclave(){
	this.debug = 1
        this.cache = 1
        if(this.cache){
            this.Cache()
        }
}

Enclave.prototype.getOrientacion = function(){
 	r = ''
	if( $(window).height() > $(window).width()){
		r = 'portrait'
	}else{
		r ='landscape'
	}
	this.console('Enclave.Orientation: '+r)
	return r
}
Enclave.prototype.console = function(e){
	if (this.debug){
		console.log(e)
	}
}

Enclave.prototype.Cache = function(){
        this.appCache = window.applicationCache
        
        if(this.debug){

            // Fired after the first cache of the manifest.
            this.appCache.addEventListener('cached', this.Cache.handleCacheEvent, false);

            // Checking for an update. Always the first event fired in the sequence.
            this.appCache.addEventListener('checking', this.Cache.handleCacheEvent, false);

            // An update was found. The browser is fetching resources.
            this.appCache.addEventListener('downloading', this.Cache.handleCacheEvent, false);

            // The manifest returns 404 or 410, the download failed,
            // or the manifest changed while the download was in progress.
            this.appCache.addEventListener('error', this.Cache.handleCacheEvent, false);

            // Fired after the first download of the manifest.
            this.appCache.addEventListener('noupdate', this.Cache.handleCacheEvent, false);

            // Fired if the manifest file returns a 404 or 410.
            // This results in the application cache being deleted.
            this.appCache.addEventListener('obsolete', this.Cache.handleCacheEvent, false);

            // Fired for each resource listed in the manifest as it is being fetched.
            this.appCache.addEventListener('progress', this.Cache.handleCacheEvent, false);

            // Fired when the manifest resources have been newly redownloaded.
            this.appCache.addEventListener('updateready', this.Cache.handleCacheEvent, false);
        
        }
}

Enclave.prototype.Cache.handleCacheEvent = function (e) {
        console.log(e)
        switch(e){
            case this.appCache.UPDATEREADY:
                if(confirm('Nueva version de la aplicaci—n disponible. Desea actualizar?')){
                    this.appCache.swapCache()
                }
            break;
        }
    
}

Enclave.prototype.CachehandleCacheError = function(e) {
  console.log('Error: Cache failed to update!');
};

