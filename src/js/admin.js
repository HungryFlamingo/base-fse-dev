/**
 * Basic imports/reqs.
 * */

const { render, Suspense } = wp.element;

import '../css/admin.scss';

import ScopedCssBaseline from '@mui/material/ScopedCssBaseline';

import ThemeProvider from '@mui/material/styles/ThemeProvider';

import { ModalProvider } from '../../common-react-hungry-flamingo/CONTEXT/ModalProvider';

import { theme } from './../../common-react-hungry-flamingo/theme-hungry-flamingo';

import { AdminPages } from './AdminPages';
import { TopMenuBar } from './AdminUI/TopMenuBar';

/**
 * Basic suspense loader.
 * */
const basicSuspense = () => <p>Loading...</p>;

function LoadAdminPage(props) {
  return (
    <React.Fragment>
      <ScopedCssBaseline>
        <ThemeProvider theme={theme}>
          <ModalProvider {...props}>
            <Suspense fallback={basicSuspense()}>
              <TopMenuBar />
              <AdminPages />
            </Suspense>
          </ModalProvider>
        </ThemeProvider>
      </ScopedCssBaseline>
    </React.Fragment>
  );
}

if (document.getElementById('hungry-flamingo-wp-fse-base-theme-admin-page')) {
  const domContainer = document.querySelector(
    '#hungry-flamingo-wp-fse-base-theme-admin-page'
  );
  render(
    <LoadAdminPage {...domContainer.dataset} />,
    document.getElementById('hungry-flamingo-wp-fse-base-theme-admin-page')
  );
}
