import Button from '@mui/material/Button';
import { useAuth } from '../hooks/AuthProvider';
import { useNavigate } from 'react-router-dom';
import { Box, Grid, Typography } from '@mui/material';

export default function Products() {
    const navigate = useNavigate();
    const auth = useAuth();
    const user = auth.user;
    const token = auth.token;

    if (!user) {
        navigate('/');
    }

    return <>
        <Grid container spacing={2} className="flex items-start justify-center w-full">
            <Grid item xs={12} className="w-full max-w-4xl p-4">
                <Typography variant="h4">Products</Typography>
                {/* products */}
            </Grid>
        </Grid>
    </>;
}