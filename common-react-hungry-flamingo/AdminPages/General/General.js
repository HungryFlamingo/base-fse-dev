import Typography from '@mui/material/Typography';
import Box from '@mui/material/Box';
export default function General() {
  return (
    <React.Fragment>
      <Box sx={{ padding: '3em' }}>
        <Typography variant='h2' component='h2'>
          Welcome to the Hungry Flamingo.
        </Typography>
        <Typography variant='body' component='p'>
          Upgrade your WordPress with organic marketing superpowers.
        </Typography>
        <Typography variant='body' component='p' sx={{ marginTop: '2em' }}>
          You are currently looking at <b>Hungry Flamingo WP Affiliate Links</b>
          . Stay tuned for the next plugin of our marketing tools!
        </Typography>
      </Box>
    </React.Fragment>
  );
}
