import React from "react";
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

const products = [
    {
        id: 1,
        name: "Wireless Headphones",
        price: "$99.99",
        image: "https://placehold.co/300x200?text=Headphones",
    },
    {
        id: 2,
        name: "Smartphone",
        price: "$699.00",
        image: "https://placehold.co/300x200?text=Smartphone",
    },
    {
        id: 3,
        name: "Fitness Tracker",
        price: "$59.99",
        image: "https://placehold.co/300x200?text=Fitness+Tracker",
    },
    {
        id: 4,
        name: "4K Monitor",
        price: "$329.99",
        image: "https://placehold.co/300x200?text=4K+Monitor",
    },
];

const ProductsGrid = () => {
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
                            image={product.image}
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
