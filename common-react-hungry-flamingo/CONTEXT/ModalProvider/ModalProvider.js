import { ModalContext } from '../ModalProvider';
import { Modal } from './../../UI/Modal';
const { Suspense } = wp.element;

// initial values
const initialState = {
  modalOpen: false,
  modalObject: {
    id: false,
    title: false,
    content: false
  }
};

// actions
const actions = {
  SET_MODAL_OPEN: 'SET_MODAL_OPEN',
  SET_MODAL_OBJECT: 'SET_MODAL_OBJECT'
};

// reducer
function ModalReducer(state, action) {
  switch (action.type) {
    case actions.SET_MODAL_OPEN:
      return {
        ...state,
        modalOpen: action.value
      };
    case actions.SET_MODAL_OBJECT:
      return {
        ...state,
        modalObject: action.value
      };
    default:
      return state;
  }
}

// export: ModalProvider
export function ModalProvider({ children }, props) {
  const [state, dispatch] = React.useReducer(ModalReducer, initialState);

  const value = {
    modalOpen: state.modalOpen,
    setModalOpen: (value) => {
      dispatch({ type: actions.SET_MODAL_OPEN, value });
    },
    modalObject: state.modalObject,
    setModalObject: (value) => {
      dispatch({ type: actions.SET_MODAL_OBJECT, value });
    }
  };

  /** Open Modal upon change of Modal content */
  React.useEffect(() => {
    if (value.modalObject != initialState.modalObject) {
      value.setModalOpen(true);
    }
  }, [value.modalObject]);

  return (
    <ModalContext.Provider value={value}>
      {children}
      <Suspense fallback={null}>
        <Modal />
      </Suspense>
    </ModalContext.Provider>
  );
}
