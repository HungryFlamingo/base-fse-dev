import { ModalContext } from '../../../../common-react-hungry-flamingo/CONTEXT/ModalProvider';
import { Button } from './../../../../common-react-hungry-flamingo/UI/Button';

import AddAffiliateModal from '../../AdminPages/WpFseBaseTheme';

import Grid from '@mui/material/Grid';

export default function TopMenuBar() {
  const { modalObject, setModalObject } = React.useContext(ModalContext);

  const handleAddAffiliateClick = (e) => {
    setModalObject({
      ...modalObject,
      id: 'AddAffiliate',
      title: 'Add new affiliate',
      content: <AddAffiliateModal />
    });
  };

  if (wpEnv.admin_page === 'hungry-flamingo-wp-affiliate-links') {
    return (
      <React.Fragment>
        <Grid container sx={{ padding: '1em', marginBottom: '1em' }}>
          <Grid item xs={12} sm={6}>
            <Button
              buttonText='Add affiliate'
              onClick={(e) => handleAddAffiliateClick(e)}
              startIcon='add'
            />
          </Grid>
        </Grid>
      </React.Fragment>
    );
  } else if (wpEnv.admin_page === 'hungry-flamingo') {
    return (
      <React.Fragment>
        <Grid container sx={{ padding: '1em', marginBottom: '1em' }}>
          <Grid item xs={12} sm={6}></Grid>
        </Grid>
      </React.Fragment>
    );
  } else {
    return null;
  }
}
