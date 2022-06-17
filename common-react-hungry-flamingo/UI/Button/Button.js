import React from 'react';
import { useTheme } from '@mui/material/styles';
import Button from '@mui/material/Button';
import CircularProgress from '@mui/material/CircularProgress';
import Box from '@mui/material/Box';

import CheckIcon from '@mui/icons-material/Check';
import ArrowRightIcon from '@mui/icons-material/ArrowRight';
import SaveIcon from '@mui/icons-material/Save';
import UpdateIcon from '@mui/icons-material/Update';
import EditIcon from '@mui/icons-material/Edit';
import AddCircleIcon from '@mui/icons-material/AddCircle';
import HighlightOffIcon from '@mui/icons-material/HighlightOff';

/**
 * Button with a loading state and icon
 *
 * @param {string} variant - MUI variant for the style of the button
 * @param {string} type - type of the button
 * @param {string} color - value to control the color of the button
 * @param {boolean} disabled - state of the button
 * @param {string} size - size of the button
 * @param {string} buttonText - text shown in the button
 * @param {boolean} loading - state to set the button as loading or not
 * @param {string} startIcon - icon for the start of the button text
 * @param {string} endIcon - icon for the end of the button text
 * @param {boolean} success - state to control if the action was successful or not
 * @param {callback} onClick - callback function to trigger when the button is clicked
 *
 * @prop {boolean} showLoading - state for making the loading animation visible
 * @prop {boolean} showSuccess - state for making the success icon visible
 *
 */
function HFButton({
  variant = 'contained',
  type = 'submit',
  color = 'primary',
  disabled = false,
  size = 'medium',
  buttonText = '',
  loading = false,
  startIcon = undefined,
  endIcon = undefined,
  success = false,
  onClick = undefined,
  centered = false
}) {
  const theme = useTheme();

  const [showLoading, setShowLoading] = React.useState(false);
  const [showSuccess, setShowSuccess] = React.useState(false);

  React.useEffect(() => {
    if (loading === false) {
      const loadingTimer = setTimeout(function () {
        setShowLoading(false);
      }, 1000);

      return () => {
        clearTimeout(loadingTimer);
      };
    } else {
      setShowLoading(true);
    }
  }, [loading]);

  React.useEffect(() => {
    if (success !== false) {
      setShowSuccess(true);
    } else {
      setShowSuccess(false);
    }
    const successTimer = setTimeout(function () {
      setShowSuccess(false);
    }, 5000);

    return () => {
      clearTimeout(successTimer);
    };
  }, [success]);

  //Get Started Component
  const GetStartIcon = () => {
    let startIconContent = startIcon;
    if (startIcon === undefined) {
      startIconContent = <ArrowRightIcon />;
    } else if (startIcon === 'add') {
      startIconContent = <AddCircleIcon />;
    } else if (startIcon === 'save') {
      startIconContent = <SaveIcon />;
    } else if (startIcon === 'update') {
      startIconContent = <UpdateIcon />;
    } else if (startIcon === 'delete') {
      startIconContent = <HighlightOffIcon />;
    } else if (startIcon === 'edit') {
      startIconContent = <EditIcon />;
    }

    if (showSuccess) {
      startIconContent = <CheckIcon />;
    }

    return startIconContent;
  };

  return (
    <Box
      sx={{
        margin: centered ? 'auto' : theme.spacing(0),
        position: 'relative',
        textAlign: 'center',
        maxWidth: 'fit-content',
        display: 'flex',
        alignItems: 'center'
      }}
    >
      <Button
        sx={{
          whiteSpace: 'nowrap'
        }}
        variant={variant}
        type={type}
        color={color}
        disabled={disabled}
        size={size}
        startIcon={<GetStartIcon />}
        endIcon={endIcon}
        onClick={onClick}
      >
        {buttonText}
        {showLoading && (
          <CircularProgress
            size={24}
            thickness={6}
            sx={{
              color: theme.palette.lib.white,
              position: 'absolute'
            }}
          />
        )}
      </Button>
    </Box>
  );
}

export default HFButton;
