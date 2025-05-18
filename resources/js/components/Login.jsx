import { useState, useRef } from 'react';
import { Grid, Button, TextField, Typography, Box } from '@mui/material';
import { useNavigate } from 'react-router-dom';
import Avatar from '@mui/material/Avatar';
import Paper from '@mui/material/Paper';
import LockOutlinedIcon from '@mui/icons-material/LockOutlined';
import Link from '@mui/material/Link';
import { useAuth } from "../hooks/AuthProvider";

export default function Login() {
    const email = useRef(null);
    const password = useRef(null);
    const [error, setError] = useState(null);
    const [loading, setLoading] = useState(false);
    const auth = useAuth();
    const navigate = useNavigate();

    const handleSubmit = (event) => {
        event.preventDefault();
        setLoading(true);
        setError(null);
        auth.loginAction(email.current.value, password.current.value)
            .then((data) => {
                setLoading(false);
                setError(null);
                navigate('/');
            })
            .catch((error) => {
                setLoading(false);
                setError(error.message);
            });
    }

    return <>
        <Grid>
            <Paper component="form" elavation={12} onSubmit={handleSubmit} className='p-20 h-[70vh] w-[500px] mx-auto rounded-[12px] border-1 border-gray-400'>
                <Grid align='center' className='mb-10'>
                    <Avatar>
                        <LockOutlinedIcon />
                    </Avatar>
                </Grid>
                <Grid align='center' className='mb-10'>
                    {error && <Typography color="error">{error}</Typography>}
                </Grid>

                <Box display="flex" justifyContent="center" alignItems="center" mb={2}>
                    <TextField label="Email" placeholder='your@email.com' inputRef={email} fullWidth required />
                </Box>
                <Box display="flex" justifyContent="center" alignItems="center" mb={2}>
                    <TextField label="Password" placeholder='********' type='password' inputRef={password} fullWidth required />
                </Box>

                <Box display="flex" justifyContent="center" alignItems="center" mb={2}>
                   <Button type='submit' variant="contained" fullWidth>
                        {loading ? <>
                            <svg className="animate-spin h-5 w-5 mr-3 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2zm0 18a8 8 0 1 1 8-8A8.009 8.009 0 0 1 12 20z"/>
                            </svg>
                        </> : 'Login'}
                   </Button>
                </Box>

                <Typography>Don't have an account? <Link href="/register" underline="none" color="#1B6DA1">Register</Link></Typography>
            </Paper>
        </Grid>
    </>;
}