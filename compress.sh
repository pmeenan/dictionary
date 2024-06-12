echo -en '\xffDCB' > compressed.dcb && \
openssl dgst -sha256 -binary dictionary.js >> compressed.dcb && \
brotli --stdout -D dictionary.js compressed.js >> compressed.dcb