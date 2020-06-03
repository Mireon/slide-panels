import Selector from '@tools/Selector';

/**
 * The target of opening levers.
 */
export default class Target {
    /**
     * The panel key.
     *
     * @type string
     */
    private readonly panelKey: string;

    /**
     * The keychain of layers.
     *
     * @type Array<string>
     */
    private readonly layerKeychain: Array<string>;

    /**
     * The status of validity.
     *
     * @type boolean
     */
    private readonly valid: boolean = false;

    /**
     * The constructor.
     *
     * @param target { string }
     *   The target as string of keys separated by dots.
     */
    public constructor(target: string) {
        const keychain = this.extractKeychain(target);

        if (keychain === null) {
            return;
        }

        this.panelKey = keychain[0];
        this.layerKeychain = keychain.slice(1);

        const panel = Selector.panel(this.panelKey);
        const layer = Selector.layer(this.panelKey, this.layerKeychain.join('.'));

        if (panel === null) {
            return;
        }

        if (this.layerKeychain.length > 0 && layer === null) {
            return;
        }

        this.valid = true;
    }

    /**
     * Extracts keys from string and create array of keys.
     *
     * @param target { string }
     *   The target as string of keys separated by dots.
     *
     * @return Array<string>
     */
    private extractKeychain(target: string): Array<string> {
        if (target === null || target === '') {
            return null;
        }

        const result = target.split('.')
            .map((item: string) => item.trim())
            .filter((item: string) => item !== '');

        if (result.length === 0) {
            return null;
        }

        return result;
    }

    /**
     * Returns the panel key.
     *
     * @type string
     */
    public getPanelKey(): string {
        return this.panelKey;
    }

    /**
     * Returns the layer key.
     *
     * @type string
     */
    public getLayerKey(): string {
        return this.layerKeychain.join('.');
    }

    /**
     * Tells about of validity.
     *
     * @type boolean
     */
    public isValid(): boolean {
        return this.valid;
    }

    /**
     * Tells about the presence of layers.
     *
     * @type boolean
     */
    public hasLayers(): boolean {
        return this.layerKeychain.length > 0;
    }
}
