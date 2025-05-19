import {
    Grid,
    Card,
    CardMedia,
    CardContent,
    Typography,
    CardActions,
    Button,
    Box,
} from "@mui/material";
import GetProducts from "../services/GetProducts";
import { useState, useEffect } from "react";


const ProductsGrid = async () => {
    const [products, setProducts] = useState([]);
    
    await GetProducts()
        .then((data) => {
            setProducts(data.data);
        })
        .catch((error) => {
            console.error("Error fetching products:", error);
            return [];
        });
    return (
        <>
        <Box sx={{ mb: 4 }}>
            <Typography variant="h5" gutterBottom>
                Products
            </Typography>
        </Box>
        <Grid container spacing={3}>
            {products.map((product) => (
                <Grid item size={{ xs:12, sm:6, md:4, lg:4 }} key={product.id}>
                    <Card>
                        <CardMedia
                            component="img"
                            height={200}
                            width={300}
                            objectFit="cover"
                            image={product.media?.[0]?.original_url}
                            alt={product.name}
                        />
                        <CardContent>
                            <Typography variant="p" component="h4" gutterBottom>
                                {product.name}
                            </Typography>
                            <Typography color="text.secondary">{product.price}</Typography>
                        </CardContent>
                        <CardActions>
                            <Button size="small" color="secondary">
                                Add to Cart
                            </Button>
                        </CardActions>
                    </Card>
                </Grid>
            ))}
        </Grid>
    </>
    );
};

export default ProductsGrid;
