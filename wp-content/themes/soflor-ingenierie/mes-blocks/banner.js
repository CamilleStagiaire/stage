wp.blocks.registerBlockType("monBlockTheme/banner", {
    title: "Banner",
    edit: EditComponent,
    save: SaveComponent
})

function EditComponent() {
    
}

function SaveComponent() {
    return <p>mon bloc</p>
    
}