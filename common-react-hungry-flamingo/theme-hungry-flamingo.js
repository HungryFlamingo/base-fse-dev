import { createTheme, responsiveFontSizes } from '@mui/material/styles';

const themeVars = {
  colors: {
    primary: '#ff00ff',
    secondary: '#cc00cc',
    tertiary: '#7A007A',
    accentBright: '#f4b393',
    accentDark: '#494368',
    textPrimary: '#333333',
    textSecondary: '#666666',
    white: '#ffffff',
    background: '#ffffff',
    appBackground: '#fafafa',
    transparentbackground: 'rgba(250,250,250,0.75)',
    green: '#00cc66',
    red: '#A50104',
    blue: '#004abd',
    alternate: '#DDFC74'
  },
  spacing: {
    padding: '1em'
  },
  shapes: {
    borderRadius: '7px',
    heavyRadius: '23px'
  },
  typography: {
    fontFamilyPrimary:
      '-apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans","Droid Sans", "Helvetica Neue", sans-serif',
    fontFamilyBold:
      '-apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans","Droid Sans", "Helvetica Neue", sans-serif',
    fontFamilySecondary:
      '-apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans","Droid Sans", "Helvetica Neue", sans-serif',
    fontFamilySecondaryBold:
      '-apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans","Droid Sans", "Helvetica Neue", sans-serif'
  }
};

let themeObj = createTheme({
  shapes: {
    borderRadius: themeVars.shapes.borderRadius,
    heavyRadius: themeVars.shapes.heavyRadius,
    gridSpacing: '5em',
    itemPadding: '.2rem 2rem'
  },
  transitions: {
    duration: {
      shortest: 100,
      shorter: 100,
      short: 150,
      standard: 200,
      complex: 300,
      enteringScreen: 200,
      leavingScreen: 300
    }
  },
  palette: {
    primary: {
      main: themeVars.colors.primary,
      highlight: themeVars.colors.accentBright,
      background: themeVars.colors.background
    },
    secondary: {
      main: themeVars.colors.secondary
    },
    success: {
      main: themeVars.colors.green
    },
    text: {
      primary: themeVars.colors.textPrimary,
      secondary: themeVars.colors.textSecondary
    },
    lib: {
      primary: '#ff00ff',
      secondary: '#cc00cc',
      tertiary: '#7A007A',
      accentBright: '#f4b393',
      accentDark: '#494368',
      textPrimary: '#333333',
      textSecondary: '#666666',
      white: '#ffffff',
      background: '#ffffff',
      appBackground: '#fafafa',
      transparentbackground: 'rgba(250,250,250,0.75)',
      green: '#00cc66',
      red: '#A50104',
      blue: '#004abd',
      alternate: '#DDFC74'
    }
  },
  typography: {
    primary: {
      fontFamily: themeVars.typography.fontFamilyPrimary
    },
    primaryBold: {
      fontFamily: themeVars.typography.fontFamilyPrimaryBold
    },
    secondary: {
      fontFamily: themeVars.typography.fontFamilySecondary
    },
    secondaryBold: {
      fontFamily: themeVars.typography.fontFamilySecondaryBold
    },
    h1: {
      fontSize: '2rem',
      fontWeight: '700',
      fontFamily: themeVars.typography.fontFamilySecondaryBold
    },
    h2: {
      fontSize: '1.5rem',
      fontWeight: '700',
      fontFamily: themeVars.typography.fontFamilySecondaryBold
    },
    h3: {
      fontSize: '1rem',
      fontWeight: '700',
      fontFamily: themeVars.typography.fontFamilySecondaryBold
    },
    h4: {
      fontSize: '1rem',
      fontWeight: '700',
      fontFamily: themeVars.typography.fontFamilyPrimaryBold
    },
    h5: {
      fontSize: '0.8rem',
      fontWeight: '700',
      fontFamily: themeVars.typography.fontFamilyPrimaryBold
    },
    h6: {
      fontSize: '0.8rem',
      fontWeight: '700',
      fontFamily: themeVars.typography.fontFamilyPrimaryBold,
      textTransform: 'uppercase'
    }
  },
  components: {
    MuiButton: {
      styleOverrides: {
        root: {
          fontFamily: themeVars.typography.fontFamilyPrimaryBold,
          fontWeight: '700'
        },
        contained: {
          fontFamily: themeVars.typography.fontFamilyPrimaryBold,
          fontWeight: '700',
          color: themeVars.colors.white
        },
        containedPrimary: {
          background: themeVars.colors.tertiary,
          '&:hover': {
            background: themeVars.colors.secondary
          },
          '&:active': {
            background: themeVars.colors.secondary
          }
        },
        outlined: {
          '.MuiCircularProgress-root': {
            color: themeVars.colors.primary
          }
        }
      }
    },
    MuiCard: {
      styleOverrides: {
        root: {
          borderRadius: themeVars.shapes.heavyRadius,
          padding: themeVars.spacing.padding
        }
      }
    },
    MuiInputLabel: {
      styleOverrides: {
        root: {
          zIndex: '999999',
          marginLeft: '7px'
        }
      }
    },
    MuiModal: {
      styleOverrides: {
        root: {
          zIndex: 9999999999999
        }
      }
    }
  }
});
export const theme = responsiveFontSizes(themeObj);
