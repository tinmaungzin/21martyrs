function getCookie(name, options) {
  const { domain = window.location.hostname, path = "/" } = options || {};

  return Cookies.get(name, {
    domain,
    path,
    ...options,
  });
}

function setCookie(name, value, options) {
  Cookies.set(name, value, options);
}
