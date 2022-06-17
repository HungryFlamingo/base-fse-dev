import { WpFseBaseTheme } from './WpFseBaseTheme';
import { General } from './../../../common-react-hungry-flamingo/AdminPages/General';

export default function AdminPages() {
  if (wpEnv.admin_page === 'hungry-flamingo-wp-fse-base-theme') {
    return <WpFseBaseTheme />;
  } else if (wpEnv.admin_page === 'hungry-flamingo') {
    return <General />;
  } else {
    return null;
  }
}
