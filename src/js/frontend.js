/**
 * Basic imports/reqs.
 * */
const { render } = wp.element;

import '../css/frontend.scss';

/**
 * Basic suspense loader.
 * */
const basicSuspense = () => <p>Loading...</p>;

// Remove debug console logging on frontend in production mode
if (process.env.NODE_ENV === 'production') {
  console.debug = () => {};
}

function LoadAdminPage(props) {
  return null;
}

if (document.getElementById('base-fse-frontend-container')) {
  const domContainer = document.querySelector('#base-fse-frontend-container');
  render(
    <LoadAdminPage {...domContainer.dataset} />,
    document.getElementById('base-fse-frontend-container')
  );
}
