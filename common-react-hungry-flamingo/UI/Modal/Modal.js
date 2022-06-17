/** imports */
import { ModalContext } from './../../CONTEXT/ModalProvider';
import { Button } from './../Button';
import Dialog from '@mui/material/Dialog';
import DialogActions from '@mui/material/DialogActions';
import DialogContent from '@mui/material/DialogContent';
import DialogTitle from '@mui/material/DialogTitle';

export default function Modal() {
  /** set context */
  const { modalOpen, setModalOpen, modalObject } =
    React.useContext(ModalContext);

  /** handlers */
  const handleClose = () => {
    setModalOpen(false);
  };

  /** Elements */
  const LoadDialogTitle = () => {
    if (modalObject.title) {
      return (
        <React.Fragment>
          <DialogTitle
            id={'form-dialog-title-' + (modalObject.id ? modalObject.id : '')}
          >
            {modalObject.title}
          </DialogTitle>
        </React.Fragment>
      );
    } else {
      return null;
    }
  };

  return (
    <Dialog
      open={modalOpen}
      onClose={handleClose}
      aria-labelledby={
        'form-dialog-title-' + (modalObject.id ? modalObject.id : '')
      }
      disableEscapeKeyDown={false}
      fullWidth={true}
      maxWidth={'md'}
    >
      <LoadDialogTitle />
      <DialogContent>
        {modalObject.content ? modalObject.content : ''}
      </DialogContent>
      <DialogActions>
        <Button onClick={handleClose} color='primary' buttonText='Close' />
      </DialogActions>
    </Dialog>
  );
}
