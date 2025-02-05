const { registerPlugin } = wp.plugins;
const { PluginDocumentSettingPanel } = wp.editPost;
const { ToggleControl } = wp.components;
const { useSelect, useDispatch } = wp.data;

const ContainerToggleControl = () => {
    const meta = useSelect((select) => select('core/editor').getEditedPostAttribute('meta'), []);
    const { editPost } = useDispatch('core/editor');

    return (
        <PluginDocumentSettingPanel
            name="enable-container-toggle"
            title="Enable Container"
            className="enable-container-toggle"
        >
            <ToggleControl
                label="Enable Container"
                checked={!!meta.enable_container}
                onChange={(value) => editPost({ meta: { ...meta, enable_container: value } })}
            />
        </PluginDocumentSettingPanel>
    );
};

registerPlugin('container-toggle', { render: ContainerToggleControl });
