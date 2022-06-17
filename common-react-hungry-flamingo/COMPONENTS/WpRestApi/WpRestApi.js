export function WpRestApi(endpoint, method = 'GET', params = undefined) {
  const bodyObjBase = {
    endpoint: endpoint,
    current_time: new Date().toLocaleTimeString(),
    _wpnonce: wpEnv._wp_rest_nonce,
    _wp_http_referer: wpEnv._wp_http_referer
  };

  const bodyObj = { ...bodyObjBase };

  if (params !== undefined) {
    bodyObj['data'] = JSON.stringify(params);
  } else {
    bodyObj['data'] = null;
  }

  async function get() {
    const response = await fetch(
      wpEnv._wp_rest_url +
        'hungry-flamingo/v1/' +
        wpEnv.plugin_slug +
        '/' +
        endpoint,
      {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json; charset=utf-8',
          'X-WP-Nonce': wpEnv._wp_rest_nonce
        }
      }
    )
      .then((res) => {
        if (res.ok) {
          return res.json();
        } else {
          throw new Error('Server response was not OK');
        }
      })
      .then((data) => {
        return data;
      });

    return response.success != undefined
      ? response
      : '{"success":false, "msg":"Unknown error"}';
  }

  async function post() {
    var bodyJson = JSON.stringify(bodyObj);

    const response = await fetch(
      wpEnv._wp_rest_url +
        'hungry-flamingo/v1/' +
        wpEnv.plugin_slug +
        '/' +
        endpoint,
      {
        method: 'POST',
        body: bodyJson,
        headers: {
          'Content-Type': 'application/json; charset=utf-8',
          'X-WP-Nonce': wpEnv._wp_rest_nonce
        }
      }
    )
      .then((res) => {
        if (res.ok) {
          return res.json();
        } else {
          throw new Error('Server response was not OK');
        }
      })
      .then((data) => {
        return data;
      });

    return response.success != undefined
      ? response
      : '{"success":false, "msg":"Unknown error"}';
  }

  if ('GET' === method) {
    return get();
  } else if ('POST' === method) {
    return post();
  } else {
    return null;
  }
}
